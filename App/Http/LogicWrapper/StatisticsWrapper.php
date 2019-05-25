<?php

namespace App\Http\LogicWrapper;

class StatisticsWrapper extends AbstractWrapper
{
    public function execute()
    {
        $this->setAveragePostLengthByMonth();
        $this->setMaximumPostLengthByMonth();
        $this->setTotalPostsPerWeek();
        $this->setAveragePostsByUserPerMonth();

        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array
     */
    protected function setAveragePostLengthByMonth()
    {
        $tmp_stats = [];

        foreach ($this->input as $post) {
            $month = date('m', strtotime($post['created_time']));
            $tmp_stats[$month] = (isset($tmp_stats[$month]) ? $tmp_stats[$month] : ['cnt' => 0, 'sum' => 0]);
            $tmp_stats[$month]['cnt']++;
            $tmp_stats[$month]['sum'] += strlen($post['message']);
        }

        foreach ($tmp_stats as $month => $data) {
            $stats[$month] = $data['cnt'] > 0 ? round($data['sum'] / $data['cnt'], 2) : 0;
        }

        $this->result['averagePostLengthByMonth'] = $stats;

        return $stats;
    }

    /**
     * @return array
     */
    protected function setMaximumPostLengthByMonth()
    {
        $stats = [];

        foreach ($this->input as $post) {
            $month = date('m', strtotime($post['created_time']));
            $stats[$month] = (isset($stats[$month]) ? $stats[$month] : 0);
            $stats[$month] = max($stats[$month], strlen($post['message']));
        }

        $this->result['maximumPostLengthByMonth'] = $stats;

        return $stats;
    }

    /**
     * @return array
     */
    protected function setTotalPostsPerWeek()
    {
        $stats = [];
        foreach ($this->input as $post) {
            $week = date('W', strtotime($post['created_time']));
            $stats[$week] = (isset($stats[$week]) ? $stats[$week] : 0);
            $stats[$week]++;
        }

        $this->result['totalPostsPerWeek'] = $stats;

        return $stats;
    }

    /**
     * @return array
     */
    protected function setAveragePostsByUserPerMonth()
    {
        $stats = [];
        $tmp_stats = [];

        foreach ($this->input as $post) {
            $month = date('m', strtotime($post['created_time']));
            $tmp_stats[$month] = (isset($tmp_stats[$month]) ? $tmp_stats[$month] : []);
            $tmp_stats[$month][$post['from_id']] =
                (isset($tmp_stats[$month][$post['from_id']]) ? $tmp_stats[$month][$post['from_id']] : 0);
            $tmp_stats[$month][$post['from_id']]++;
        }

        foreach ($tmp_stats as $month => $month_data) {
            $user_cnt = 0;
            $post_cnt = 0;

            foreach ($month_data as $user_post_cnt) {
                $user_cnt++;
                $post_cnt += $user_post_cnt;
            }
            $stats[$month] = $user_cnt > 0 ? round($post_cnt / $user_cnt, 2) : 0;
        }

        $this->result['averagePostsByUserPerMonth'] = $stats;

        return $stats;
    }
}
