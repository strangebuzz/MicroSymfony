<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use App\Controller\FormAction;
use App\Form\Type\RegisterForm;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

#[CoversClass(FormAction::class)]
#[CoversClass(RegisterForm::class)]
final class FormActionTest extends WebTestCase
{
    private const FORM_SUBMIT_BUTTON_ID = 'register_form_save';

    public function testFormValidationErrors(): void
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/form');
        self::assertResponseIsSuccessful();

        $form = $crawler->selectButton(self::FORM_SUBMIT_BUTTON_ID)->form();
        $client->submit($form);
        self::assertResponseIsUnprocessable();
    }

    public function testFormSuccess(): void
    {
        $client = self::createClient();
        $crawler = $client->request('GET', '/form');
        self::assertResponseIsSuccessful();

        $form = $crawler->selectButton(self::FORM_SUBMIT_BUTTON_ID)->form();
        $client->submit($form, [
            $form->getName().'[name]' => 'COil',
            $form->getName().'[email]' => 'user@example.com',
            $form->getName().'[country]' => 'FR',
            $form->getName().'[currency]' => 'EUR',
            $form->getName().'[birthday]' => '2003-03-12',
            $form->getName().'[fruit]' => 1,
        ]);
        self::assertResponseIsSuccessful();
    }
}
