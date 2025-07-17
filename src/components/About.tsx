import { Card, CardContent } from "@/components/ui/card";
import { Lightbulb, Users, Target, Zap } from "lucide-react";

export const About = () => {
  const features = [
    {
      icon: Lightbulb,
      title: "Innovation",
      description: "Cutting-edge solutions that push the boundaries of what's possible."
    },
    {
      icon: Users,
      title: "Collaboration",
      description: "Working together to achieve extraordinary results for our clients."
    },
    {
      icon: Target,
      title: "Precision",
      description: "Focused approach ensuring every detail meets the highest standards."
    },
    {
      icon: Zap,
      title: "Performance",
      description: "Lightning-fast delivery without compromising on quality."
    }
  ];

  return (
    <section id="about" className="py-20 bg-gradient-secondary">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        <div className="max-w-3xl mx-auto text-center mb-16">
          <h2 className="text-4xl sm:text-5xl font-bold text-foreground mb-6">
            About Our Vision
          </h2>
          <p className="text-xl text-muted-foreground leading-relaxed">
            We're passionate about creating digital experiences that inspire, engage, 
            and deliver exceptional value. Our team combines creativity with technical 
            expertise to bring your vision to life.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {features.map((feature, index) => (
            <Card 
              key={index} 
              className="border-0 shadow-elegant hover:shadow-glow transition-all duration-300 hover:scale-105 bg-card/50 backdrop-blur-sm"
            >
              <CardContent className="p-6 text-center">
                <div className="w-16 h-16 mx-auto mb-4 bg-gradient-primary rounded-full flex items-center justify-center shadow-glow">
                  <feature.icon className="h-8 w-8 text-white" />
                </div>
                <h3 className="text-xl font-semibold text-foreground mb-3">
                  {feature.title}
                </h3>
                <p className="text-muted-foreground">
                  {feature.description}
                </p>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </section>
  );
};