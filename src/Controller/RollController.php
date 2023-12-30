<?php
namespace App\Controller;

use App\Mj; 
use App\Deck;
use App\Coin;
use App\Dice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RollController extends AbstractController
{
    public function roll(Request $request): Response
    {
        $mj = new Mj([
            new Deck(['rouge', 'vert', 'bleu'], [1, 2, 3, 4, 5, 6]),
            new Coin(3),
            new Dice([1, 2, 3, 4, 5, 6]),
        ]);

        $critRate = $request->query->get('critRate', 3);

        if ($critRate < 1) {
            return $this->render('index.html.twig', [
                'error' => 'Le taux de critique doit être supérieur ou égal à 1.',
            ]);
        }

        $result = $mj->rollForCrit($critRate);

        return $this->render('index.html.twig', [
            'result' => $result ? 'Vous avez réussi !' : 'Vous avez échoué.',
            'rollValue' => $result ? $mj->getRollValue() : null,
        ]);
    }
}
