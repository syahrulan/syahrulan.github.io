<?php

function getYoutubeId($url)
{
    preg_match('/(youtu\.be\/|youtube\.com\/(watch\?v=|embed\/|v\/|.+\?v=))([^&]+)/', $url, $matches);
    return $matches[3] ?? null;
}
