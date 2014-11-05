<?php

namespace WDG\RestBundle\Manager;

use Symfony\Component\Security\Core\Util\SecureRandomInterface;

class ProjectManager
{
    /** @var array projects */
    protected $data = array();

    /**
     * @var \Symfony\Component\Security\Core\Util\SecureRandomInterface
     */
    protected $randomGenerator;

    /**
     * @var string
     */
    protected $cacheDir;

    public function __construct(SecureRandomInterface $randomGenerator, $cacheDir)
    {
        if (file_exists($cacheDir . '/sf_project_data')) {
            $data = file_get_contents($cacheDir . '/sf_project_data');
            $this->data = unserialize($data);
        }

        $this->randomGenerator = $randomGenerator;
        $this->cacheDir = $cacheDir;
    }

    private function flush()
    {
        file_put_contents($this->cacheDir . '/sf_project_data', serialize($this->data));
    }

    public function fetch($start = 0, $limit = 5)
    {
        return array_slice($this->data, $start, $limit, true);
    }

    public function get($id)
    {
        if (!isset($this->data[$id])) {
            return false;
        }

        return $this->data[$id];
    }

    public function set($project)
    {
        if (null === $project->id) {
            if (empty($this->data)) {
                $project->id = 0;
            } else {
                end($this->data);
                $project->id = key($this->data) + 1;
            }
        }

        $this->data[$project->id] = $project;
        $this->flush();
    }

    public function remove($id)
    {
        if (!isset($this->data[$id])) {
            return false;
        }

        unset($this->data[$id]);
        $this->flush();

        return true;
    }
}
