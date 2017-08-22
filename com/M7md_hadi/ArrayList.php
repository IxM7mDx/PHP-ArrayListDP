<?php
/**
 * Created by PhpStorm.
 * User: Win
 * Date: 8/23/2017
 * Time: 2:15 AM
 */

namespace com\M7md_hadi;


class ArrayList {


    var $arrayList;

    var $pointer=0;

    function ArrayList($arr="") {
        if (is_array($arr) == true)
            $this->arrayList = $arr;
        else
            $this->arrayList = array();
    }

    function addToPos($index, $obj) {
        if ($this->isInteger($index))
            $this->arrayList[$index] = $obj;

    }


    function add($obj) {
        array_push($this->arrayList, $obj);
    }

    function addAll($arr) {
        $this->arrayList = array_merge($this->arrayList, $arr);
    }

    function clear() {
        $this->arrayList = array();
    }

    function contains($obj) {
        return in_array($obj, $this->arrayList);
    }

    function get($index) {
        if ($this->isInteger($index))
            return $this->arrayList[$index];

    }

    function indexOf($obj) {
        while (list ($key, $val) = each ($this->arrayList))
            if ($obj == $val) return $key;
        return -1;
    }

    function isEmpty() {
        if (count($this->arrayList) == 0) return true;
        else return false;
    }

    function lastIndexOf($obj) {
        return array_search($obj, $this->arrayList);
    }

    function remove($index) {
        if ($this->isInteger($index)) {
            $newArrayList = array();

            for ($i=0; $i < $this->size(); $i++)
                if ($index != $i) $newArrayList[] = $this->get($i);

            $this->arrayList = $newArrayList;
        }

    }


    function removeRange($fromIndex, $toIndex) {
        if ($this->isInteger($fromIndex) && $this->isInteger($toIndex)) {
            $newArrayList = array();

            for ($i=0; $i < $this->size(); $i++)
                if ($i < $fromIndex || $i > $toIndex ) $newArrayList[] = $this->get($i);

            $this->arrayList = $newArrayList;
        }

    }

    function size() {
        return count($this->arrayList);
    }

    function sort() {
        sort($this->arrayList);
    }

    function toArray() {
        return $this->arrayList;
    }

    function hasNext() {
        $this->pointer++;

        if ($this->pointer == $this->size()) return false;
        else return true;
    }

    function reset() {
        reset($this->arrayList);
        $this->pointer=0;
    }

    function next() {
        $cur = current($this->arrayList);
        next($this->arrayList);
        return $cur;
    }

    function isInteger($toCheck) {
        return eregi("^-?[0-9]+$", $toCheck);
    }
}