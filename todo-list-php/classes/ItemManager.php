<?php

/**
 * Manages items for the todo list.
 */
class ItemManager
{
    private Redis $redis;
    private array $items = [];

    public function __construct()
    {
        $this->redis = new Redis();
        if (! $this->redis->connect('redis', 6379)) {
            echo "Failed to connect to redis!";
            exit(1);
        }

        $this->load();
    }

    public function load(): void
    {
        $fromRedis = $this->redis->get('items');
        if ($fromRedis === false) {
            return;
        }

        $items = json_decode($fromRedis, true);
        if (is_array($items)) {
            $this->items = $items;
        }
    }

    public function save(): void
    {
        $this->redis->set('items', json_encode($this->items));
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(string $note): void
    {
        array_push($this->items, [
            "id" => time(),
            "note" => $note,
        ]);

        $this->save();
    }

    public function deleteItem(int $id): void
    {
        $this->items = array_filter($this->items, fn ($item) => $item["id"] !== $id);

        $this->save();
    }
}