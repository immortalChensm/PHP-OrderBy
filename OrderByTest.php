<?

use PHPUnit\Framework\TestCase;

require 'OrderBy.php';

class OrderByTest extends TestCase
{
    public function testOrderBy()
    {
        $products = [
            ['month' => '2020/01/01', 'key1' => 3, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 1],
            ['month' => '2017/01/01', 'key1' => 2, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 2],
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 3],
        ];

        $sort = ['key1'];

        $sortedProducts = orderBy($products, $sort);

        $this->assertEquals([
            ['month' => '2017/01/01', 'key1' => 1, 'key2' => 1, 'key3' => 1, 'key4' => 2, 'key5' => 3, 'id' => 3],
            ['month' => '2017/01/01', 'key1' => 2, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 2, 'id' => 2],
            ['month' => '2020/01/01', 'key1' => 3, 'key2' => 1, 'key3' => 1, 'key4' => 1, 'key5' => 1, 'id' => 1],
        ], $sortedProducts);
    }
}