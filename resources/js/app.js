import './bootstrap';
import '../css/app.css';
import 'flowbite';
import { Observer } from 'tailwindcss-intersect';
 

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
Observer.start();