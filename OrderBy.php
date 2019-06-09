<?

function orderBy(array $items, array $sortItems)
{
    $order = [];
    foreach ($sortItems as $sortItem) {
        $order[] = explode(' ', $sortItem);
    }

    $callback = function($first, $second) use($order) {

        if ($first[$order[0][0]] == $second[$order[0][0]] &&
            $first[$order[1][0]] == $second[$order[1][0]] &&
            $first[$order[2][0]] == $second[$order[2][0]] &&
            $first[$order[3][0]] == $second[$order[3][0]] &&
            $first[$order[4][0]] == $second[$order[4][0]]) {

            return $first[$order[5][0]] < $second[$order[5][0]] ? ($order[5][1] === 'desc' ? 1 : -1) : ($order[5][1] === 'desc' ? -1 : 1);
        }

        if ($first[$order[0][0]] == $second[$order[0][0]] &&
            $first[$order[1][0]] == $second[$order[1][0]] &&
            $first[$order[2][0]] == $second[$order[2][0]] &&
            $first[$order[3][0]] == $second[$order[3][0]]) {
            return $first[$order[4][0]] < $second[$order[4][0]] ? ($order[4][1] === 'desc' ? 1 : -1) : ($order[4][1] === 'desc' ? -1 : 1);
        }

        if ($first[$order[0][0]] == $second[$order[0][0]] &&
            $first[$order[1][0]] == $second[$order[1][0]] &&
            $first[$order[2][0]] == $second[$order[2][0]]) {
            return $first[$order[3][0]] < $second[$order[3][0]] ? ($order[3][1] === 'desc' ? 1 : -1) : ($order[3][1] === 'desc' ? -1 : 1);
        }

        if ($first[$order[0][0]] == $second[$order[0][0]] &&
            $first[$order[1][0]] == $second[$order[1][0]]) {
            return $first[$order[2][0]] < $second[$order[2][0]] ? ($order[2][1] === 'desc' ? 1 : -1) : ($order[2][1] === 'desc' ? -1 : 1);
        }

        if ($first[$order[0][0]] == $second[$order[0][0]]) {
            return $first[$order[1][0]] < $second[$order[1][0]] ? ($order[1][1] === 'desc' ? 1 : -1) : ($order[1][1] === 'desc' ? -1 : 1);
        }

        return $first[$order[0][0]] < $second[$order[0][0]] ?($order[0][1] === 'desc' ? 1 : -1) : ($order[0][1] === 'desc' ? -1 : 1) ;
    };

    $callback ? uasort($items, $callback) : asort($items);

    return array_values($items);
}


