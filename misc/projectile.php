<?php

include '../src/Tuple.php';

class Projectile
{
    public Tuple $position;
    public Tuple $velocity;

    public function __construct()
    {
        $this->position = Tuple::createPoint(0, 1, 0);
        $this->velocity = Tuple::createVector(1, 1, 0)->normalize();
    }
}

class Environment
{
    public Tuple $gravity;
    public Tuple $wind;

    public function __construct()
    {
        $this->gravity = Tuple::createVector(0, -0.1, 0);
        $this->wind = Tuple::createVector(-.01, 0, 0);
    }
}

class Game
{

    static public function tick(Environment $env, Projectile $proj)
    {
        $new_pos =$proj->position->addTuple($proj->velocity);
        $temp_vel = $env->gravity->addTuple($env->wind);
        $new_velocity = $proj->velocity->addTuple($temp_vel);
        $proj->position = $new_pos;
        $proj->velocity = $new_velocity;
    }

}

$projectile = new Projectile;
$environment = new Environment;

echo($projectile->velocity->x . "\n");
while($projectile->position->y > 0) {
    echo($projectile->position->x . ' ' . $projectile->position->y . ' '. $projectile->position->z . "\n");
    Game::tick($environment, $projectile);
}