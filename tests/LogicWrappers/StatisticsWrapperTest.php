<?php
use App\Http\LogicWrappers\StatisticsWrapper;
use PHPUnit\Framework\TestCase;

/**
 * Class StatisticsWrapperTest
 */
class StatisticsWrapperTest extends TestCase
{
    /**
     * @dataProvider getInputData
     *
     * @param $expected
     * @param $input
     */
    public function testAnalyseData($expected, $input)
    {
        $wrapper = new StatisticsWrapper($input);
        $wrapper->execute();
        $wrapper->getResult();

        $this->assertSame($expected, $wrapper->getResult());
    }

    /**
     * dataProvider for testAnalyseData()
     *
     * @return array
     */
    public function getInputData()
    {
        return [
            [
                [
                    'averagePostLengthByMonth' => [
                        '05' => 80.0,
                    ],
                    'maximumPostLengthByMonth' => [
                        '05' => 108,
                    ],
                    'totalPostsPerWeek' => [
                        21 => 1,
                        20 => 2,
                    ],
                    'averagePostsByUserPerMonth' => [
                        '05' => 1.0,
                    ],
                ],
                [
                    [
                        'id' => 'post5ce9c19faf669_73d6ea06',
                        'from_name' => 'Britany Heise',
                        'from_id' => 'user_4',
                        'message' => 'blah-blah-blah-blah-blah-blah',
                        'type' => 'status',
                        'created_time' => '2019-05-25T17:32:56+00:00',
                    ],
                    [
                        'id' => 'post5ce9c19faf75b_000a6052',
                        'from_name' => 'Britany Heise',
                        'from_id' => 'user_14',
                        'message' => 'host despise value snub nest seem deadly shorts master peasant migration glow think excavation begin suggest',
                        'type' => 'status',
                        'created_time' => '2019-05-13T17:32:56+00:00',
                    ],
                    [
                        'id' => 'post5ce9c19faf7fd_936fee84',
                        'from_name' => 'Carly Alvarez',
                        'from_id' => 'user_6',
                        'message' => 'haircut cluster braid ban center lot recruit snake counter falsify expertise crusade sweet grip housing',
                        'type' => 'status',
                        'created_time' => '2019-05-14T01:48:08+00:00',
                    ],
                ],
            ],
            [
                [
                    'averagePostLengthByMonth' => [
                        '05' => 108.0,
                    ],
                    'maximumPostLengthByMonth' => [
                        '05' => 108,
                    ],
                    'totalPostsPerWeek' => [
                        20 => 1,
                    ],
                    'averagePostsByUserPerMonth' => [
                        '05' => 1.0,
                    ],
                ],
                [
                    [
                        'id' => 'post5ce9c19faf75b_000a6052',
                        'from_name' => 'Britany Heise',
                        'from_id' => 'user_14',
                        'message' => 'host despise value snub nest seem deadly shorts master peasant migration glow think excavation begin suggest',
                        'type' => 'status',
                        'created_time' => '2019-05-13T17:32:56+00:00',
                    ],
                ],
            ],
        ];
    }
}
