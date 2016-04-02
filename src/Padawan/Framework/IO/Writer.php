<?php

namespace Padawan\Framework\IO;

use Padawan\Domain\Core\Project;

class Writer extends BasicIO
{
    public function write(Project $project)
    {
        $this->writeToFile(
            $this->getIndexFileName($project->getRootDir()),
            $this->prepare($project)
        );
    }
    protected function prepare(Project $project)
    {
        $index = $project->getIndex();
        $str = serialize($project);
        return $str;
    }
    protected function writeToFile($fileName, $data)
    {
        $this->getPath()->write($fileName, $data);
    }
}