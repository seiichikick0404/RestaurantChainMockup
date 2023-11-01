<?php

namespace Models;

use DateTime;
use Models\User;



class Employee extends User {

    private string $jobTitle;

    private float $salary;

    private DateTime $statDate;

    private array $awards;
}