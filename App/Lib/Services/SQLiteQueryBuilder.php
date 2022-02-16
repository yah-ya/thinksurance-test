<?php

namespace App\Lib\Services;

use App\Lib\Interfaces\QueryBuilderInterface;

class SQLiteQueryBuilder implements QueryBuilderInterface
{

    private $table = '';
    private $cols = '';
    private $where = '';
    private $limit = '';
    private $method = '';
    private $set = '';

    public function table(string $table): QueryBuilderInterface
    {
        $this->table = $table;
        return $this;
    }

    public function select(string $cols): QueryBuilderInterface
    {
        $this->method = 'SELECT';
        $this->cols = $cols;
        return $this;
    }

    public function where(string $where): QueryBuilderInterface
    {
        $this->where = $where;
        return $this;
    }

    public function limit($from, $length): QueryBuilderInterface
    {
        $this->limit = ' LIMIT '.$from . ' , '.$length;
        return $this;
    }

    public function update(string $query): QueryBuilderInterface
    {
        $this->method = 'UPDATE';
        return $this;
    }

    public function set(string $query): QueryBuilderInterface
    {
        $this->set = $query;
        return $this;
    }

    public function delete(string $table): QueryBuilderInterface
    {
        $this->method = 'DELETE';
        return $this;
    }

    public function createTable(string $table, array $columns): string
    {
        $query = "CREATE TABLE IF NOT EXISTS ".$table." (";
        $query .= implode(',',$columns);

        $query .= ");";
        return $query;
    }

    public function insert(array $items):string
    {
        $query = "INSERT INTO " . $this->table . " VALUES" ;
        $i=0;
        foreach($items as $item){
            //Worst code ever O_o
            // I had to do this , sorry
            $query .= "(";
            $j=0;
            foreach($item as $el){

                $query .= "'".$el."'";
                if($j<count($item)-1)
                    $query .= ',';
                $j++;
            }
            $query .= ")";
            if($i<count($items)-1)
                $query .= ",";

            $i++;
        }
        $query .= ";";
        return $query;
    }

    public function get():string
    {
        $query = '';
        if($this->method=='SELECT')
        {
            $query = 'SELECT '. $this->cols .' FROM '.$this->table;
        } else if($this->method=='UPDATE') {
            $query = 'UPDATE ' . $this->table . ' ' . $this->set;
        } else if ($this->method=='DELETE'){
            $query = 'DELETE FROM ' . $this->table;
        }

        if(!empty($this->where)){
            $query .= ' WHERE '. $this->where;
        }

        if(empty($this->limit)){
            $query .= ' '. $this->limit;
        }

        return $query;
    }

    public function truncate(): string
    {
        return 'DELETE FROM '.$this->table;
    }
}
