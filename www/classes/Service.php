<?
class Service {
    private string $mainKey = '23bc075b710da43f0ffb50ff9e889aed';

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
            // if(!$clientAmo->checkValidKey()) continue;

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

    // получаем броин
    public function getBookingsByDate(): array {
        $bookings = [];

        // массив на 30 дней
        $today = strtotime('today');
        for ($i = 0; $i < 30; $i++) {
            $date = date('Y-m-d', strtotime("+$i days", $today));
            $bookings[$date] = 0;
        }

        $clientAmo = new Client($this->mainKey);

        // Получаем все подходящие сделки
        $filDate = strtotime('today') - (30*24*60*60);
        $deals = $clientAmo->getDeals([20715778, 9585813, 41493883, 142], 50, $filDate);
        if(!empty($deals['result']) && is_array($deals['result'])) {
            foreach ($deals['result'] as $deal) {
                if (!isset($deal['custom_fields'])) continue;
                foreach($deal['custom_fields'] as $custom_field) {
                    if ($custom_field['id'] != 970963) continue;

                    $dateKey = date('Y-m-d', strtotime($custom_field['values'][0]['value']));
                    if(array_key_exists($dateKey, $bookings)) $bookings[$dateKey]++;
                }
            }
        }

        return $bookings;
    }
}