<?php

include '../src/Tuple.php';
include '../src/Canvas.php';
include '../src/Color.php';

class Projectile
{
    public Tuple $position;
    public Tuple $velocity;

    public function __construct()
    {
        $this->position = Tuple::createPoint(0, 1, 0);
        $this->velocity = Tuple::createVector(1, 1.8, 0)->normalize()->multiplyTuple(11.25);
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
$canvas = new Canvas(900, 500);

while($projectile->position->y > 0) {
    $x = (int)round($projectile->position->x);
    $y = $canvas->height - (int)round($projectile->position->y);
    $red = new Color(1,0,0);
    $canvas->writeColor($red, $y, $x);
    Game::tick($environment, $projectile);
}
$ppm_string = $canvas->canvasToPPM();
file_put_contents("test.ppm", $ppm_string);