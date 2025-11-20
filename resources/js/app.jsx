import './bootstrap';
import React from "react";
import { createRoot } from "react-dom/client";
import { Layout } from '@/pages/sidebartampil.tsx';

const plswork = document.getElementById("sidebar-root");
  if (plswork) {
    createRoot(plswork).render(<Layout />)
  }

