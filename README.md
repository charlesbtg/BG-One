# Bella: AI‑Powered Check‑In Kiosk

An interactive, tablet‑friendly check‑in assistant for computer repair shops, “Bella” guides customers through a conversational multi‑step wizard to register or look up their device, then automatically creates or updates a RepairShopr ticket and notifies your team.

## Features

- **Conversational Wizard**  
  Step‑by‑step Livewire component that asks natural questions (“Hi, I’m Bella—your check‑in buddy!”), handles returning vs. new clients, and collects device details.

- **RepairShopr Integration**  
  Stubbed API calls to search or create customers, open tickets, and post bot‑generated comments (ready for full REST integration).

- **Notifications**  
  Placeholders for Microsoft Teams webhooks and Twilio SMS to alert staff and confirm check‑in with the customer.

- **Offline Resilience**  
  Service Worker & IndexedDB queuing (planned) to persist in‑flight data when connectivity blips, synchronizing when back online.

- **Automated Testing**  
  Pest test suite for each wizard step, ensuring reliable check‑in flows and preventing regressions in kiosk mode.

- **Extensible UI/UX**  
  Tailwind CSS, Vite‑powered asset bundling, and Blade templates for rapid theming, animations (Bella’s wag!), and accessibility.

## Tech Stack

- **Backend**: Laravel 10, PHP 8.1+, Livewire  
- **Frontend**: Blade + Tailwind CSS, Vite, optional Web Speech API  
- **Storage**: MySQL/MariaDB (or SQLite for light shops), IndexedDB (offline)  
- **Testing**: PestPHP, PHPUnit  
- **Notifications**: Twilio SDK, Teams Incoming Webhooks  
- **Version Control**: Git & GitHub (Issues, Milestones)

Instructions, dependencies and installation soon to come...
