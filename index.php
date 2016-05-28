<?php 
use CodeCourse\Repositories\UserRepository as UserRepository;
use CodeCourse\Filters\AuthFilters as AuthFilters;

require_once 'app/start.php';

new UserRepository();
new AuthFilters();