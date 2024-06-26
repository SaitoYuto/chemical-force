import { UI } from "@/constants/UI";
import { user } from "@/stores/user";

export const SIDE_BAR = [
  { path: "/", icon: UI.ICON.HOME, title: "Home", visibility: true },
  {
    path: "/deal",
    icon: UI.ICON.TOOL_BOX,
    title: "Deal",
    visibility: true,
  },
  {
    path: "/area",
    icon: UI.ICON.CITY,
    title: "Area",
    visibility: true,
  },
  {
    path: "/team",
    icon: UI.ICON.TEAM,
    title: "Team",
    visibility: user().isSupervisor,
  },
];
