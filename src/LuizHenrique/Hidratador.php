<?php

namespace LuizHenrique;

/**
 * Trait Hidratador
 *
 * @author Luiz Henrique
 */
trait Hidratador
{

    /**
     * @param \PDO $dbh
     * @param array $data
     * @return bool
     */
    public function save(\PDO $dbh, Array $data)
    {
        foreach ($data as $prop => $value) {
            if (property_exists($this, $prop)) {
                call_user_func_array(array($this, "set" . $prop), array($value));
            }
        }
        $table = mb_strtolower(str_replace(__NAMESPACE__ . '\\', null, get_class($this)));
        $data = get_object_vars($this);
        foreach ($data as $col => $value) {
            $bindParams[":{$col}"] = trim($value);
            $cols[] = $col;
            $params[] = ":{$col}";
        }
        $cols = implode(', ', $cols);
        $params = implode(', ', $params);
        $stmt = $dbh->prepare("INSERT INTO {$table} ({$cols}) values ({$params})");
        foreach ($bindParams as $col => $value) {
            $stmt->bindValue($col, $value);
        }
        return $stmt->execute();
    }
}