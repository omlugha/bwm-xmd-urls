import { Separator } from "@/components/ui/separator";
import { Heart } from "lucide-react";

export const Footer = () => {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-foreground text-background py-12">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          {/* Brand */}
          <div className="md:col-span-2">
            <h3 className="text-2xl font-bold bg-gradient-to-r from-primary-glow to-white bg-clip-text text-transparent mb-4">
              WebSite
            </h3>
            <p className="text-background/80 max-w-md">
              Creating digital experiences that inspire, engage, and deliver 
              exceptional value for businesses and individuals worldwide.
            </p>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="font-semibold mb-4">Quick Links</h4>
            <ul className="space-y-2">
              <li><a href="#home" className="text-background/80 hover:text-background transition-colors">Home</a></li>
              <li><a href="#about" className="text-background/80 hover:text-background transition-colors">About</a></li>
              <li><a href="#services" className="text-background/80 hover:text-background transition-colors">Services</a></li>
              <li><a href="#contact" className="text-background/80 hover:text-background transition-colors">Contact</a></li>
            </ul>
          </div>

          {/* Services */}
          <div>
            <h4 className="font-semibold mb-4">Services</h4>
            <ul className="space-y-2">
              <li><span className="text-background/80">Web Development</span></li>
              <li><span className="text-background/80">UI/UX Design</span></li>
              <li><span className="text-background/80">Mobile Apps</span></li>
              <li><span className="text-background/80">Digital Strategy</span></li>
            </ul>
          </div>
        </div>

        <Separator className="bg-background/20 mb-8" />

        <div className="flex flex-col md:flex-row justify-between items-center">
          <p className="text-background/80 text-sm">
            © {currentYear} WebSite. All rights reserved.
          </p>
          <div className="flex items-center mt-4 md:mt-0">
            <span className="text-background/80 text-sm mr-2">Made with</span>
            <Heart className="h-4 w-4 text-red-500 fill-current" />
            <span className="text-background/80 text-sm ml-2">by WebSite Team</span>
          </div>
        </div>
      </div>
    </footer>
  );
};