<?php

namespace Crunchzapp\Traits;

trait MessageTrait {
    public function startTyping(): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-message/typing',
            'body' => [
                'contact_id' => $this->contactId
            ]
        ];
        return $this;
    }

    public function stopTyping(): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-message/stop-typing',
            'body' => [
                'contact_id' => $this->contactId
            ]
        ];
        return $this;
    }

    public function checkNumber($phoneNumber): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'GET',
            'path' => '/channel/check-phone-number',
            'body' => [
                'phone' => $phoneNumber
            ]
        ];
        return $this;
    }

    public function text($message): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-message/text',
            'body' => [
                'contact_id' => $this->contactId,
                'message' => $message
            ]
        ];
        return $this;
    }

    public function image($caption, $mimeType, $filename, $url): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/image',
            'body' => [
                'contact_id' => $this->contactId,
                'caption' => $caption,
                'file' => [
                    'mimeType' => $mimeType,
                    'filename' => $filename,
                    'url' => $url
                ]
            ]
        ];
        return $this;
    }

    public function location($latitude, $longitude, $title): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/location',
            'body' => [
                'contact_id' => $this->contactId,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'title' => $title
            ]
        ];
        return $this;
    }

    public function voice($audioUrl): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/voice',
            'body' => [
                'contact_id' => $this->contactId,
                'audioUrl' => $audioUrl
            ]
        ];
        return $this;
    }

    public function video($videoUrl, $caption): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/video',
            'body' => [
                'contact_id' => $this->contactId,
                'videoUrl' => $videoUrl,
                'caption' => $caption
            ]
        ];
        return $this;
    }

    public function react($messageId, $reaction): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'PUT',
            'path' => '/send-image/reaction',
            'body' => [
                'message_id' => $messageId,
                'reaction' => $reaction,
            ],
        ];
        return $this;
    }

    public function polling($title, $options = [], $isMultipleAnswer = false): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/poll',
            'body' => [
                'contact_id' => $this->contactId,
                'title' => $title,
                'options' => $options,
                'is_multiple_answer' => $isMultipleAnswer
            ]
        ];
        return $this;
    }

    public function star($messageId, $starred = true): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'PUT',
            'path' => '/send-image/star',
            'body' => [
                'message_id' => $messageId,
                'starred' => $starred
            ]
        ];
        return $this;
    }

    public function delete($messageId): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'DELETE',
            'path' => '/send-image/delete',
            'body' => [
                'message_id' => $messageId,
            ]
        ];
        return $this;
    }

    public function seen($messageId): static
    {
        $this->payload[] = [
            'name' => __FUNCTION__,
            'method' => 'POST',
            'path' => '/send-image/seen',
            'body' => [
                'message_id' => $messageId,
            ]
        ];
        return $this;
    }
}
