<?php

namespace App\Enum;

enum TurnStatus: string
{
  case WeekDay = 'weekday';
  case WeekNight = 'weeknight';
  case WeekendDay = 'weekendday';
  case WeekendNight = 'weekendnight';
}
