<?php

namespace App\Enum;

enum TurnStatus: string
{
  case WeekDay = 'week-day';
  case WeekNight = 'week-night';
  case WeekendDay = 'weekend-day';
  case WeekendNight = 'weekend-night';
}
