import "./bootstrap";
import "./index";
import "@fortawesome/fontawesome-free/css/all.css";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();
