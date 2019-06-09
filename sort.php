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
    return $items;
}

$products = [
    ['month' => '2020/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 1],
    ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 2],
    ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 3],
    ['month' => '2017/01/01', 'key1' => 3, 'key2' => 3, 'key3' => 3, 'key4' => 3, 'key5' => 1, 'id' => 4],
    ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 5],
    ['month' => '2017/01/01', 'key1' => 2, 'key2' => 2, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 6],
    ['month' => '2017/01/01', 'key1' => 1, 'key2' => 4, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 7],
    ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 2, 'key4' => 1, 'key5' => 2, 'id' => 8],
    ['month' => '2018/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 9],
];

$sort = ['key1', 'key2'];

$sortedProducts = orderBy($products, $sort);

print_r($sortedProducts);

