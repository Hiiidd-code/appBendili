import './bootstrap';
import React from "react";
import { createRoot } from "react-dom/client";
import { Layout } from '@/pages/sidebartampil.tsx';
import { CardDemo } from './components/app-card';
import Caraousel from './components/app-caraousel';
import Bar from './components/app-dialog';

const buka = document.getElementById("dialog-root");
  if (buka) {
    createRoot(buka).render(<Bar />)
  }

const cardin = document.getElementById("card-root");
  if (cardin) {
    createRoot(cardin).render(<CardDemo />)
  }

const Carousel = document.getElementById("carousel-root");
  if (Carousel) {
    createRoot(Carousel).render(<Caraousel />)
  }

const plswork = document.getElementById("sidebar-root");
  if (plswork) {
    createRoot(plswork).render(<Layout />)
  }

