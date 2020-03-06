<?php
$categories = [
    "farming",
    "electronics",
    "articles",
    "youtube",
    "concepts",
    "health",
    "dreams",
    "technology",
    "undefined",
    #"deleted",
    "research",
    "experiences",
    "mythology",
    "yellowpages",

    "abroad",
    "jobs",
    "disasters",
    "governance",
    "automation",
    'organization',
    "education",
];

sort($categories);

function input($value="")
{
    return preg_replace("/[^a-z0-9\.\-]/is", "", $value);
}

function _count_notes($category="")
{
    $notes = glob("../notes/{$category}/notes-*.txt");
    return count($notes);
}

function _explore($category="")
{
    $counter = _count_notes($category);
    return "<a href='notes.php?category={$category}'>{$category} <span class='counter'>({$counter})</span></a>";
}

function _move($cat="")
{
    global $name;
    global $category;

    $class = $category==$cat?"active":"";

    $counter = _count_notes($cat);
    return "<a class='{$class}' href='move.php?to={$cat}&amp;from={$category}&amp;name={$name}'>{$cat} <span class='counter'>({$counter})</span></a>";
}
