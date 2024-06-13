import {
  BanknotesIcon,
  UserPlusIcon,
  UsersIcon,
  ChartBarIcon,
} from "@heroicons/react/24/solid";

export const statisticsCardsData = [
  
  {
    color: "gray",
    icon: UsersIcon,
    title: "Today's Aplicants",
    value: "30",
    footer: {
      color: "text-green-500",
      value: "+3%",
      label: "than last month",
    },
  },
  {
    color: "gray",
    icon: UserPlusIcon,
    title: "Hired Aplicants",
    value: "10",
    footer: {
      color: "text-red-500",
      value: "-1%",
      label: "than last week",
    },
  },
  {
    color: "gray",
    icon: ChartBarIcon,
    title: "Total Aplicants",
    value: "240",
    footer: {
      color: "text-green-500",
      value: "+5%",
      label: "last month",
    },
  },
];

export default statisticsCardsData;
