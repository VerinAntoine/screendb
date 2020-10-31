url=localhost:8080

if [[ $1 = "-o" ]] ; then
  if which xdg-open > /dev/null ; then
    xdg-open "http://$url"
  elif which gnome-open > /dev/null ; then
    gnome-open $url
  else
    x-www-browser $url
  fi
fi

php -S $url -t public
