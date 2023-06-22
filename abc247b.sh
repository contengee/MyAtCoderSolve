#!/bin/bash

function s_n {
  local n=$1
  if (( n == 1 )); then
    echo -n "1 "
  else
    s_n $((n-1))
    echo -n "$n "
    s_n $((n-1))
  fi
}

read n
s_n $n
echo ""
