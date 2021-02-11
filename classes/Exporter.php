<?php
namespace classes;

use classes\Controller;
use Illuminate\Support;
use LSS\Array2Xml;
use traits\ExportTrait;

class Exporter extends Controller
{
    use ExportTrait;

    private $args;

    public function __construct($args) {
        $this->args = $args;
    }
    
    public function export($type, $format) {
        $data = [];
        switch ($type) {
            case 'playerstats':
                $searchArgs = ['player', 'playerId', 'team', 'position', 'country'];
                $search = $this->args->filter(function($value, $key) use ($searchArgs) {
                    return in_array($key, $searchArgs);
                });
                $data = $this->getPlayerStats($search);
                break;
            case 'players':
                $searchArgs = ['player', 'playerId', 'team', 'position', 'country'];
                $search = $this->args->filter(function($value, $key) use ($searchArgs) {
                    return in_array($key, $searchArgs);
                });
                $data = $this->getPlayers($search);
                break;
        }
        if (!$data) {
            exit("Error: No data found!");
        }
        return $this->format($data, $format);
    }

}
?>