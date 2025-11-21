import './bootstrap';
import React from "react";
import { createRoot } from "react-dom/client";
import { Layout } from '@/pages/sidebartampil.tsx';
import { CardDemo } from './components/app-card';

const cardin = document.getElementById("card-root");
  if (cardin) {
    createRoot(cardin).render(<CardDemo />)
  }

const plswork = document.getElementById("sidebar-root");
  if (plswork) {
    createRoot(plswork).render(<Layout />)
  }

