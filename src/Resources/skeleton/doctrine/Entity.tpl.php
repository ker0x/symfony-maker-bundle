<?= "<?php\n" ?>

namespace <?= $namespace ?>;

<?php if ($api_resource): ?>use ApiPlatform\Core\Annotation\ApiResource;
<?php endif ?>
use <?= $repository_full_class_name ?>;
use Doctrine\ORM\Mapping as ORM;
<?php if ($broadcast): ?>use Symfony\UX\Turbo\Attribute\Broadcast;
<?php endif ?>

<?php if ($use_attributes): ?>
#[
<?php if ($api_resource): ?>    ApiResource,
<?php endif ?>
<?php if ($broadcast): ?>    Broadcast,
<?php endif ?>
    ORM\Entity(repositoryClass: <?= $repository_class_name ?>::class),
<?php if ($should_escape_table_name): ?>    ORM\Table(name: "`<?= $table_name ?>`"),
<?php endif ?>
]
<?php else: ?>
/**
<?php if ($api_resource): ?> * @ApiResource()
<?php endif ?>
<?php if ($broadcast): ?> * @Broadcast()
<?php endif ?>
 * @ORM\Entity(repositoryClass=<?= $repository_class_name ?>::class)
<?php if ($should_escape_table_name): ?> * @ORM\Table(name="`<?= $table_name ?>`")
<?php endif ?>
*/
<?php endif ?>
class <?= $class_name."\n" ?>
{
    <?php if ($use_attributes): ?>
    #[
        ORM\Id,
        ORM\GeneratedValue,
        ORM\Column(type: "integer")
    ]
    <?php else: ?>
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    <?php endif ?>
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
