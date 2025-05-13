<?
class Service {
    // получаем список клиентов
    private function getClients(): array {
        return [
            [
                'id' => 1,
                'name' => 'intrdev',
                'api' => '23bc075b710da43f0ffb50ff9e889aed',
            ],
            [
                'id' => 2,
                'name' => 'fos',
                'api' => '23bc075b710da43f0ffb50ff9e889aed',
            ],
            [
                'id' => 3,
                'name' => 'artedegrass0',
                'api' => '23bc075b710da43f0ffb50ff9e889aedrtt',
            ],
        ];
    }

    // расчитываем суммы за период
    public function listData(int $dateFrom, int $dateTo): array {
        $clients = $this->getClients();
        $results = [];
        $total = 0;

        foreach($clients as $client) {
            $clientAmo = new Client($client['api']);
            if(!$clientAmo->checkValidKey()) continue;

            $deals = $clientAmo->getDeals([142], 50);
            $clientPrices = 0;

            if(!empty($deals['result']) && is_array($deals['result'])) {
                foreach($deals['result'] as $deal) {
                    if($deal['date_close'] >= $dateFrom && $deal['date_close'] <= $dateTo) {
                        $clientPrices += $deal['price'];
                    }
                }
            }

            $results[] = [
                'id' => $client['id'],
                'name' => $client['name'],
                'prices' => $clientPrices,
            ];
            $total += $clientPrices;
        }

        return [
            'results' => $results,
            'total' => $total,
        ];
    }
}