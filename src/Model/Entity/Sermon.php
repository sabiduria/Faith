<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sermon Entity
 *
 * @property int $id
 * @property int $topic_id
 * @property int $church_id
 * @property string|null $banner
 * @property string|null $title
 * @property string|null $verse
 * @property string|null $summary
 * @property string|null $sermon
 * @property string|null $contributor
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Topic $topic
 * @property \App\Model\Entity\Church $church
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Media[] $medias
 * @property \App\Model\Entity\Verse[] $verses
 */
class Sermon extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'topic_id' => true,
        'church_id' => true,
        'banner' => true,
        'title' => true,
        'verse' => true,
        'summary' => true,
        'sermon' => true,
        'contributor' => true,
        'created' => true,
        'modified' => true,
        'createdby' => true,
        'modifiedby' => true,
        'deleted' => true,
        'topic' => true,
        'church' => true,
        'comments' => true,
        'likes' => true,
        'medias' => true,
        'verses' => true,
    ];
}
