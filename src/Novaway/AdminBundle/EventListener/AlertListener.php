<?php

namespace Novaway\AdminBundle\EventListener;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use Novaway\CommonBundle\Entity\Actor;
use Novaway\CommonBundle\Entity\Author;
use Novaway\CommonBundle\Entity\Director;
use Symfony\Component\Translation\TranslatorInterface;

class AlertListener
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    private $translator;

    /**
     * AlertListener constructor.
     *
     * @param \Swift_Mailer                                      $mailer
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     */
    public function __construct(\Swift_Mailer $mailer, TranslatorInterface $translator)
    {
        $this->mailer = $mailer;
        $this->translator = $translator;
    }

    /**
     * @param \Doctrine\ORM\Event\PreUpdateEventArgs $args
     *
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        $toString = $entity->__toString();

        if ($entity instanceof Actor) {
            $this->findAlertsBy('actor', $toString);
        }

        if ($entity instanceof Director) {
            $this->findAlertsBy('director', $toString);
        }

        if ($entity instanceof Author) {
            $this->findAlertsBy('author', $toString);
        }
    }

    /**
     * Recherche la chaine exacte dans le tableau statique, et envoie un mail
     * On pourrait faire mieux, mais c'est déjà pas mal ;-)
     *
     * @param string $type
     * @param string $searchString
     *
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    protected function findAlertsBy($type, $searchString)
    {
        $alerts = $this->getAllAlerts();

        foreach ($alerts as $alert) {
            if ($alert['type'] === $type && in_array(
                $searchString,
                $alert['keywords'],
                true
              )) {
                  $this->sendAlert($alert['email'], $type, $searchString);
              }
        }
    }

    /**
     * @param string $email
     * @param string $type
     * @param string $searchString
     *
     * @throws \Symfony\Component\Translation\Exception\InvalidArgumentException
     */
    protected function sendAlert($email, $type, $searchString)
    {
        $subject = $this->translator->trans('alert.subject', [
          '%type' => $type,
          '%keyword' => $searchString,
        ]);
        $body = $this->translator->trans('alert.body', [
          '%keyword' => $searchString,
        ]);
        $message = \Swift_Message::newInstance()
          ->setSubject($subject)
          ->setFrom('noreply@example.com')
          ->setTo($email)
          ->setBody($body,'text/html');
        $failedRecipients = [];
        $sent = $this->mailer->send($message);

        dump($email, $type, $searchString, $message);
        exit();
    }

    /**
     * @return array
     */
    protected function getAllAlerts()
    {
        return [
          [
            'email' => 'jonathan@novaway.fr',
            'type' => 'actor',
            'keywords' => [
              'Leonardo DiCaprio',
              'Jean Dujardin',
            ],
          ],
          [
            'email' => 'cedric@novaway.fr',
            'type' => 'director',
            'keywords' => [
              'Steven Spielberg',
              'Woody Allen',
            ],
          ],
          [
            'email' => 'laurence@novaway.fr',
            'type' => 'author',
            'keywords' => [
              'Jean Anouilh',
              'Guillaume Musso',
              'Franz-Olivier Giesbert',
            ],
          ],
          [
            'email' => 'laurence@novaway.fr',
            'type' => 'actor',
            'keywords' => [
              'Edward Norton',
              'Jack Nicholson',
              'Robert De Niro',
            ],
          ],
        ];
    }
}