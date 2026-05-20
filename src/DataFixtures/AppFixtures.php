<?php

namespace App\DataFixtures;

use App\Entity\Abonne;
use App\Entity\Emprunt;
use App\Entity\Livre;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre->setTitre("Les misérables");
        $livre->setAuteur("Victor Hugo");
        $livre->setIsbn("1234567890");
        $livre->setDatePublication(new DateTime('2022-01-01'));
        $livre->setDisponible(true);

        $livre2 = new Livre();
        $livre2->setTitre("Les Ombres de Verre");
        $livre2->setAuteur("Camille Dervaux");
        $livre2->setIsbn("615065");
        $livre2->setDatePublication(new DateTime('2019-01-01'));
        $livre2->setDisponible(true);

        $livre3 = new Livre();
        $livre3->setTitre("Le Dernier Atlas");
        $livre3->setAuteur("Julien Morel");
        $livre3->setIsbn("665065");
        $livre3->setDatePublication(new DateTime('2022-01-01'));
        $livre3->setDisponible(true);

        $livre4 = new Livre();
        $livre4->setTitre("Sous les Etoiles d'Ambre");
        $livre4->setAuteur("Elise Garnier");
        $livre4->setIsbn("06512");
        $livre4->setDatePublication(new DateTime('2022-01-01'));
        $livre4->setDisponible(true);

        $livre5 = new Livre();
        $livre5->setTitre("La Cité des Brumes");
        $livre5->setAuteur("Thomas Valençay");
        $livre5->setIsbn("082965");
        $livre5->setDatePublication(new DateTime('2022-01-01'));
        $livre5->setDisponible(true);

        $livre6 = new Livre();
        $livre6->setTitre("Fragments du Silence");
        $livre6->setAuteur("Nora Bellanger");
        $livre6->setIsbn("946651");
        $livre6->setDatePublication(new DateTime('2022-01-01'));
        $livre6->setDisponible(true);

        $livre7 = new Livre();
        $livre7->setTitre("Les Jardins du Temps");
        $livre7->setAuteur("Arthur Lenoir");
        $livre7->setIsbn("91610");
        $livre7->setDatePublication(new DateTime('2022-01-01'));
        $livre7->setDisponible(true);

        $livre8 = new Livre();
        $livre8->setTitre("Minuit sur Avalon");
        $livre8->setAuteur("Clara Montfort");
        $livre8->setIsbn("5561");
        $livre8->setDatePublication(new DateTime('2022-01-01'));
        $livre8->setDisponible(true);

        $livre9 = new Livre();
        $livre9->setTitre("Le Chant des Abysses");
        $livre9->setAuteur("Maxime Roussel");
        $livre9->setIsbn("1592");
        $livre9->setDatePublication(new DateTime('2022-01-01'));
        $livre9->setDisponible(true);

        $livre10 = new Livre();
        $livre10->setTitre("Hunger Games");
        $livre10->setAuteur("Suzanne Collins");
        $livre10->setIsbn("4526");
        $livre10->setDatePublication(new DateTime('2022-01-01'));
        $livre10->setDisponible(true);

        $abonne = new Abonne();
        $abonne->setNom("Frou");
        $abonne->setPrenom("Grégoire");
        $abonne->setEmail("gregoire.frou@gmail.com");
        $abonne->setDateInscription(new DateTime('2022-01-01'));

        $abonne2 = new Abonne();
        $abonne2->setNom("Millet");
        $abonne2->setPrenom("Jules");
        $abonne2->setEmail("jules.millet@gmail.com");
        $abonne2->setDateInscription(new DateTime('2022-01-01'));

        $abonne3 = new Abonne();
        $abonne3->setNom("Mejjiou");
        $abonne3->setPrenom("Mohamed-Amine");
        $abonne3->setEmail("mohamed.mejjiou@gmail.com");
        $abonne3->setDateInscription(new DateTime('2022-01-01'));

        $abonne4 = new Abonne();
        $abonne4->setNom("Vernat");
        $abonne4->setPrenom("Gabriel");
        $abonne4->setEmail("gabriel.vernat@gmail.com");
        $abonne4->setDateInscription(new DateTime('2022-01-01'));

        $abonne5 = new Abonne();
        $abonne5->setNom("Guibert");
        $abonne5->setPrenom("Kevin");
        $abonne5->setEmail("kevin.guibert@gmail.com");
        $abonne5->setDateInscription(new DateTime('2022-01-01'));

        $emprunt = new Emprunt();
        $emprunt->setDateEmprunt(new DateTime('2026-05-20'));
        $emprunt->setDateRetourPrevue(new DateTime('2026-05-27'));
        $emprunt->setLivreId($livre);
        $emprunt->setAbonneId($abonne2);

        $emprunt2 = new Emprunt();
        $emprunt2->setDateEmprunt(new DateTime('2026-05-20'));
        $emprunt2->setDateRetourPrevue(new DateTime('2026-05-27'));
        $emprunt2->setLivreId($livre8);
        $emprunt2->setAbonneId($abonne4);

        $emprunt3 = new Emprunt();
        $emprunt3->setDateEmprunt(new DateTime('2026-05-20'));
        $emprunt3->setDateRetourPrevue(new DateTime('2026-05-27'));
        $emprunt3->setLivreId($livre7);
        $emprunt3->setAbonneId($abonne5);

        $manager->persist($livre);
        $manager->persist($livre2);
        $manager->persist($livre3);
        $manager->persist($livre4);
        $manager->persist($livre5);
        $manager->persist($livre6);
        $manager->persist($livre7);
        $manager->persist($livre8);
        $manager->persist($livre9);
        $manager->persist($livre10);

        $manager->persist($abonne);
        $manager->persist($abonne2);
        $manager->persist($abonne3);
        $manager->persist($abonne4);
        $manager->persist($abonne5);
        
        $manager->persist($emprunt);
        $manager->persist($emprunt2);
        $manager->persist($emprunt3);
      
        $manager->flush();

    }
}
