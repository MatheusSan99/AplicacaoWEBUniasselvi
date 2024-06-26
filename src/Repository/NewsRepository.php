<?php

declare(strict_types=1);

namespace Seminario\Mvc\Repository;

use PDO;
use Seminario\Mvc\Entity\News;

class NewsRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(News $news): bool
    {
        $sql = 'INSERT INTO news (title, content, author, date, category, image) VALUES (?, ?, ?, ?, ?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $news->getTitle());
        $statement->bindValue(2, $news->getContent());
        $statement->bindValue(3, $news->getAuthor());
        $statement->bindValue(4, $news->getDate());
        $statement->bindValue(5, $news->getCategory());
        $statement->bindValue(6, $news->getImage());

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $news->setId(intval($id));

        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM news WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    public function update(News $news): bool
    {
        $idNumber = !empty($news->getImage()) ? 7 : 6;

        $sql = 'UPDATE news SET title = ?, content = ?, author = ?, date = ?, category = ?';

        if ($news->getImage() !== null) {
            $sql .= ', image = ?';
        }

        $sql .= ' WHERE id = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $news->getTitle());
        $statement->bindValue(2, $news->getContent());
        $statement->bindValue(3, $news->getAuthor());
        $statement->bindValue(4, $news->getDate());
        $statement->bindValue(5, $news->getCategory());
        $statement->bindValue($idNumber, $news->getId());

        if ($news->getImage() !== null) {
            $statement->bindValue(6, $news->getImage());
        }

        return $statement->execute();
    }

    /**
     * @return News[]
     */
    public function all(): array
    {
        $newsList = $this->pdo
            ->query('SELECT * FROM news;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            $this->hydrateNews(...),
            $newsList
        );
    }

    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM news WHERE id = ?;');
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateNews($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateNews(array $newsList): News
    {
        $dateString = \DateTime::createFromFormat('d/m/Y H:i:s', $newsList['date']);
        if (!$dateString) {
            throw new \Exception("Failed to parse date string '{$newsList['date']}'");
        }
        $category = $newsList['category'] ?? 'Uncategorized';
        
        $news = new News($newsList['title'],
        $newsList['content'], 
        $newsList['author'],
        $dateString,
        $category,
        $newsList['image']
    );

        $news->setId($newsList['id']);

        return $news;
    }

    public function removeImage(int $id): bool
    {
        $sql = 'UPDATE news SET image = NULL WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }
}
