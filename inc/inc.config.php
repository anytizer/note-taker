<?php
class NoteDTO
{
    public $title;
    public $text;
}

class CategoryDTO
{
    public $name;
    public $folder; // Dynamic Field

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class note_manager
{
    private $path;
    public $categories;

    public function __construct()
    {
        $this->path = "../notes";
        $this->categories = [
            "abroad" => new CategoryDTO("Abroad"),
            "articles" => new CategoryDTO("Articles"),
            "automation" => new CategoryDTO("Automation"),
            "concepts" => new CategoryDTO("Concepts"),
            "disasters" => new CategoryDTO("Disasters"),
            "dreams" => new CategoryDTO("Dreams"),
            "education" => new CategoryDTO("Education"),
            "electronics" => new CategoryDTO("Electronics"),
            "experiences" => new CategoryDTO("Experience"),
            "farming" => new CategoryDTO("Farming"),
            "governance" => new CategoryDTO("Governance"),
            "health" => new CategoryDTO("Health"),
            "jobs" => new CategoryDTO("Jobs"),
            "mythology" => new CategoryDTO("Mythology"),
            "nepal" => new CategoryDTO("Nepal Related"),
            'organization' => new CategoryDTO("Organization"),
            'politics' => new CategoryDTO("Politics"),
            "research" => new CategoryDTO("Research Materials"),
            "technology" => new CategoryDTO("Technology"),
            "yellowpages" => new CategoryDTO("Yellow Pages"),
            "youtube" => new CategoryDTO("YouTube Links"),

            "my" => new CategoryDTO("My Story (Book)"),

            "deleted" => new CategoryDTO("Deleted"),
            "undefined" => new CategoryDTO("Undefined"),
        ];
    }

    /**
     * Create host directories to store notes
     */
    public function install()
    {
        foreach($this->categories as $folder => $category)
        {
            $path = "{$this->path}/{$folder}";
            mkdir($path);
        }
    }

    public function categories()
    {
        return array_keys($this->categories);
    }

    public function create($notes="")
    {
        $category = $this->_valid_category("undefined");

        $datestamp = date("Ymd-His");
        $name = "notes-{$datestamp}.txt";
        $file = "{$this->path}/{$category}/{$name}";

        $fc = file_put_contents($file, $notes, FILE_APPEND|FILE_BINARY);
    }

    public function read($category="deleted", $name="*.txt"): NoteDTO
    {
        $category = $this->_valid_category($category);
        $file = "{$this->path}/{$category}/{$name}";

        $title = "";
        $text = "";
        if(is_file($file))
        {
            $title = file($file, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES)[0];
            $text = file_get_contents($file);
        }

        $note = new NoteDTO();
        $note->title = $title;
        $note->text = $text;

        return $note;
    }

    public function edit($folder="", $name="", $note="")
    {
        $category = $this->_valid_category($folder);

        $file = "{$this->path}/{$category}/{$name}";
        $fc = file_put_contents($file, strip_tags($note), FILE_BINARY);
    }

    /**
     * Migrate an article to different category
     *
     * @param string $to
     * @param string $from
     * @param string $name
     */
    public function move($to="", $from="", $name="")
    {
        $to = $this->_valid_category($to);
        $from = $this->_valid_category($from);

        $file = "{$this->path}/{$from}/{$name}";
        if(!is_file($file))
        {
            die("Invalid note file");
        }

        if(!is_dir("{$this->path}/{$to}"))
        {
            mkdir("{$this->path}/{$to}");
        }

        rename($file, "{$this->path}/{$to}/{$name}");
    }

    public function search($query="")
    {
        $files = [];
        $pattern = "/".preg_quote($query)."/is";

        foreach($this->categories as $folder => $category)
        {
            $searches = glob("{$this->path}/{$folder}/notes-*.txt");
            foreach($searches as $s => $search)
            {
                $fc = file_get_contents($search);
                if(preg_match($pattern, $fc))
                {
                    // the only files that matched
                    $files[] = [
                        "category" => $this->_category($folder), // object!
                        "search" => $search,
                    ];
                }
            }
        }

        return $files;
    }

    private function _valid_category($folder="undefined")
    {
        $folder = preg_replace("/[^a-z0-9\.\-]/is", "", $folder);

        if(!array_key_exists($folder, $this->categories))
        {
            $folder="undefined";
        }

        return $folder;
    }

    public function notes($category="")
    {
        $category = $this->_valid_category($category);

        $files = glob("{$this->path}/{$category}/notes-*.txt");
        $files = array_reverse($files);
        return $files;
    }

    private function _category($folder=""): CategoryDTO
    {
        $cat = $this->categories[$folder];
        $cat->folder = $folder;

        return $cat;
    }

    private function _count_notes($folder="")
    {
        $notes = glob("{$this->path}/{$folder}/notes-*.txt");
        return count($notes);
    }

    public function _explore_category($folder="")
    {
        $cat = $this->_category($folder);

        $counter = $this->_count_notes($folder);
        return "<li>
                    <a href='notes.php?category={$folder}'>{$cat->name} <span class='counter'>({$counter})</span></a>
                </li>";
    }

    public function _move_note_category($folder="")
    {
        global $name;
        global $category;

        # read.php?category=undefined&name=notes-20200307-112729.txt
        $cat = $this->_category($folder);
        $counter = $this->_count_notes($folder);

        $class = $category==$cat->folder?"active":"";
        return "<a class='{$class}' href='move.php?to={$cat->folder}&amp;from={$category}&amp;name={$name}'>{$cat->name} <span class='counter'>({$counter})</span></a>";
    }
}

#$nm = new note_manager();
#print_r($c);
#$nm->install();
#$nm->create("Something got deleted.");
# echo $nm->notes("undefined");
# echo $nm->read("deleted", "notes-20200229-194309.txt");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
