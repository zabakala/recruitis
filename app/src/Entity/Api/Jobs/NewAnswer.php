<?php
declare(strict_types=1);

namespace App\Entity\Api\Jobs;

use Symfony\Component\Validator\Constraints as Assert;

class NewAnswer
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 5)]
    public int $jobId;

    #[Assert\NotBlank]
    #[Assert\Length(min: 10, max: 50)]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Length(min: 5, max: 50)]
    public string $email;

    #[Assert\Regex('/[\+][0-9]{3}[1-9]{3}[0-9]{6}/')]
    public string $phone;

    #[Assert\NotBlank]
    #[Assert\Regex('/https:\/\/linkedin.com\/in\/.+/')]
    public string $linkedin;

    #[Assert\Regex('/https:\/\/www.facebook.com\/.+/')]
    public string $facebook;

    #[Assert\Regex('/https:\/\/twitter.com\/.+/')]
    public string $twitter;
}
