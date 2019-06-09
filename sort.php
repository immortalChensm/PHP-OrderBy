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
    ['month' => '2017/12/11', 'key1' => 1,  'key2' => 3,  'key3' => 7,  'key4' => 10, 'key5' => 6],
    ['month' => '2017/12/10', 'key1' => 10, 'key2' => 3,  'key3' => 2,  'key4' => 9,  'key5' => 8],
    ['month' => '2020/09/13', 'key1' => 2,  'key2' => 10, 'key3' => 3,  'key4' => 8,  'key5' => 7],
    ['month' => '2022/01/10', 'key1' => 3,  'key2' => 2,  'key3' => 6,  'key4' => 10, 'key5' => 4],
    ['month' => '2018/04/10', 'key1' => 4,  'key2' => 1,  'key3' => 9,  'key4' => 6,  'key5' => 4],
    ['month' => '2028/03/10', 'key1' => 1,  'key2' => 1,  'key3' => 5,  'key4' => 3,  'key5' => 10],
    ['month' => '2018/12/10', 'key1' => 5,  'key2' => 2,  'key3' => 8,  'key4' => 4,  'key5' => 1],
    ['month' => '2015/09/10', 'key1' => 1,  'key2' => 3,  'key3' => 3,  'key4' => 5,  'key5' => 5],
    ['month' => '2017/12/10', 'key1' => 10, 'key2' => 1,  'key3' => 7,  'key4' => 4,  'key5' => 3],
    ['month' => '2017/12/11', 'key1' => 1,  'key2' => 3,  'key3' => 10, 'key4' => 4,  'key5' => 2],
];

$sort = ['month', 'key1', 'key2', 'key3', 'key4', 'key5'];

$sortedProducts = orderBy($products, $sort);

print_r($sortedProducts);

