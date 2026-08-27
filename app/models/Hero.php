<?php
class Movie {
    private $data = [];

    public function __construct() {
        $this->data = [
            // Metal Heroes
            1 => [
                'id'        => 1, 
                'tipo'      => 'metal', 
                'title'     => 'Jaspion', 
                'category'  => 'Metal Hero',
                'year'      => 1985, 
                'duration'  => '46 episódios', 
                'rating'    => 9.2,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/pt/3/3a/Juspion.jpg',
                'synopsis'  => 'Jaspion é escolhido para enfrentar Satan Goss, viajando pelo espaço e pela Terra com sua armadura metálica e o robô Daileon.'
            ],
            2 => [
                'id'        => 2, 
                'tipo'      => 'metal', 
                'title'     => 'Winspector', 
                'category'  => 'Polícia Especial',
                'year'      => 1990, 
                'duration'  => '49 episódios', 
                'rating'    => 8.7,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/pt/4/4f/Winspector.jpg',
                'synopsis'  => 'Equipe especial da polícia que enfrenta crimes perigosos e situações de risco extremo com tecnologia avançada.'
            ],
            3 => [
                'id'        => 3, 
                'tipo'      => 'metal', 
                'title'     => 'Metalder', 
                'category'  => 'Drama / Metal Hero',
                'year'      => 1987, 
                'duration'  => '39 episódios', 
                'rating'    => 8.9,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/pt/0/0f/Metalder.jpg',
                'synopsis'  => 'Androide criado na guerra que desperta anos depois e enfrenta um império maligno enquanto busca entender sua existência.'
            ],
            4 => [
                'id'        => 4, 
                'tipo'      => 'metal', 
                'title'     => 'Solbrain', 
                'category'  => 'Resgate / Metal Hero',
                'year'      => 1991, 
                'duration'  => '53 episódios', 
                'rating'    => 8.4,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/pt/7/7f/Solbrain.jpg',
                'synopsis'  => 'Equipe de resgate avançada que lida com desastres, crimes e emergências com trajes metálicos e veículos especiais.'
            ],

            // Kamen Riders
            5 => [
                'id'        => 5, 
                'tipo'      => 'rider', 
                'title'     => 'Kamen Rider Black RX', 
                'category'  => 'Continuação',
                'year'      => 1988, 
                'duration'  => '1 temporada', 
                'rating'    => 9.0,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/pt/4/4f/Kamen_Rider_Black_RX.jpg',
                'synopsis'  => 'Kotaro Minami se torna Black RX e enfrenta o império Crisis protegendo a Terra com novos poderes.'
            ],
            6 => [
                'id'        => 6, 
                'tipo'      => 'rider', 
                'title'     => 'Kamen Rider Drive', 
                'category'  => 'Policial',
                'year'      => 2014, 
                'duration'  => '1 temporada', 
                'rating'    => 8.5,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/en/7/7d/Kamen_Rider_Drive.png',
                'synopsis'  => 'Policial que usa um cinto especial e carros em miniatura para combater os Roidmudes que desaceleram o tempo.'
            ],
            7 => [
                'id'        => 7, 
                'tipo'      => 'rider', 
                'title'     => 'Kamen Rider Kuuga', 
                'category'  => 'Renascimento',
                'year'      => 2000, 
                'duration'  => '1 temporada', 
                'rating'    => 8.8,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/en/5/5a/Kamen_Rider_Kuuga.png',
                'synopsis'  => 'Yusuke Godai enfrenta os Grongi e protege as pessoas com diferentes formas de poder.'
            ],
            8 => [
                'id'        => 8, 
                'tipo'      => 'rider', 
                'title'     => 'Kamen Rider W', 
                'category'  => 'Detetive',
                'year'      => 2009, 
                'duration'  => '1 temporada', 
                'rating'    => 8.9,
                'poster'    => 'https://upload.wikimedia.org/wikipedia/en/8/8f/Kamen_Rider_W.png',
                'synopsis'  => 'Dois detetives se tornam um único Rider e enfrentam crimes ligados às Gaia Memories na cidade de Fuuto.'
            ]
        ];
    }

    public function all() {
        return array_values($this->data);
    }

    public function find($id) {
        return $this->data[$id] ?? null;
    }
}