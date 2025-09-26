<?php

namespace App\Enum;

enum WorkerType: string
{
  case Physician = 'physician';
  case Nurse = 'nurse';
  case NurseTechnician = 'nurse-technician';
  case Admnistrative = 'administrative';
  case Head = 'head';
  case Other = 'other';
}
