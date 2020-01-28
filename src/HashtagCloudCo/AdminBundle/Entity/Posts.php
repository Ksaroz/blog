<?php

namespace HashtagCloudCo\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity(repositoryClass="HashtagCloudCo\AdminBundle\Repository\PostsRepository")
 */
class Posts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @var int
//     *
//     * @ORM\Column(name="post_id", type="integer", unique=true)
//     */
//    private $postId;

    /**
     * @var string
     *
     * @ORM\Column(name="post_name", type="string", length=255)
     */
    private $postName;

    /**
     * @var string
     *
     * @ORM\Column(name="post_author", type="string", length=255)
     */
    private $postAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="post_body", type="string", length=255)
     */
    private $postBody;

    /**
     * @var int
     *
     * @ORM\Column(name="post_status", type="boolean")
     */

    private $postStatus;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="users", inversedBy="posts")
     * @ORM\JoinColumn(name="post_user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Set postName.
     *
     * @param int $user
     *
     * @return Posts
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }


//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(name="created_at", type="datetime")
//     */
//    private $createdAt;
//
//    /**
//     * @var \DateTime
//     *
//     * @ORM\Column(name="updated_at", type="datetime")
//     */
//    private $updatedAt;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * Set postId.
//     *
//     * @param int $postId
//     *
//     * @return Posts
//     */
//    public function setPostId($postId)
//    {
//        $this->postId = $postId;
//
//        return $this;
//    }
//
//    /**
//     * Get postId.
//     *
//     * @return int
//     */
//    public function getPostId()
//    {
//        return $this->postId;
//    }

    /**
     * Set postName.
     *
     * @param string $postName
     *
     * @return Posts
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;

        return $this;
    }

    /**
     * Get postName.
     *
     * @return string
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set postAuthor.
     *
     * @param string $postAuthor
     *
     * @return Posts
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;

        return $this;
    }

    /**
     * Get postAuthor.
     *
     * @return string
     */
    public function getPostAuthor()
    {

        return $this->postAuthor;
    }

    /**
     * Set postBody.
     *
     * @param string $postBody
     *
     * @return Posts
     */
    public function setPostBody($postBody)
    {
        $this->postBody = $postBody;

        return $this;
    }

    /**
     * Get postBody.
     *
     * @return string
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * Set postStatus.
     *
     * @param int $postStatus
     *
     * @return Posts
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;

        return $this;
    }

    /**
     * Get postStatus.
     *
     * @return int
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }


}
