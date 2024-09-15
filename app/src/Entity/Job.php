<?php
declare(strict_types=1);

namespace App\Entity;

class Job
{

    public int $jobId;

    public bool $draft;

    public bool $active;

    public string $title;

    public string $description;

    public Contact $contact;

    public Personalist $personalist;
}
