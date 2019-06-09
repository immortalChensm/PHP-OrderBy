<?

function orderBy(array $items, array $sortItems)
{
    $orders = [];
    foreach ($sortItems as $sortItem) {
        $orders[] = explode(' ', $sortItem);
    }

    $equal = function ($first, $second, $orders, $max) {

        for ($i = 0; $i < $max;$i ++) {
            if ($first[$orders[$i][0]] !== $second[$orders[$i][0]]) {
                return false;
            }
        }

        return $first[$orders[$max][0]] < $second[$orders[$max][0]] ? ($orders[$max][1] === 'desc' ? 1 : -1) : ($orders[$max][1] === 'desc' ? -1 : 1);
    };

    $callback = function($first, $second) use($orders, $equal) {

        for ($i = count($orders) - 1;$i >= 0;$i --) {

            $result = $equal($first, $second, $orders, $i);

            if ($result !== false) {
                return $result;
            }
        }
    };

    uasort($items, $callback);

    return array_values($items);
}
