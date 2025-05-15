<?
use Introvert\Configuration;
use Introvert\ApiClient;

class Client {
    private string $apiKey;
    private string $apiHost;

    public function __construct(string $apiKey, string $apiHost = 'https://api.s1.yadrocrm.ru/tmp') {
        $this->apiKey = $apiKey;
        $this->apiHost = $apiHost;
    }

    // проверка аккаунта
    public function checkValidKey(): bool {
        try {
            $config = Configuration::getDefaultConfiguration()->setHost($this->apiHost)->setApiKey('key', $this->apiKey);

            $client = new ApiClient();
            $result = $client->account->info();

            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    // получаем сделки
    public function getDeals(array $status, int $count = 10, int $ifmodif = null): array {
        try {
            $config = Configuration::getDefaultConfiguration()->setHost($this->apiHost)->setApiKey('key', $this->apiKey);

            $offset = 0;
            $deals = [];

            do {
                $client = new ApiClient();
                $result = $client->lead->getAll([], $status, [], $ifmodif, $count, $offset);

                if(!empty($result['result']) && is_array($result['result'])) $deals = array_merge($deals, $result['result']);
                $offset += $count;

                sleep(1);
            } while(!empty($result['result']) && count($result['result']) === $count);


            return ['result' => $deals];
        } catch(Exception $e) {
            return ['result' => []];
        }
    }
}