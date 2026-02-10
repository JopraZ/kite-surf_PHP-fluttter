import 'package:flutter/material.dart';
import '../pages/home/home_page.dart';
import '../pages/centre_detail/centre_detail.dart';
import '../pages/demande/demande_page.dart';

class AppRouter {
  static Route<dynamic> onGenerateRoute(RouteSettings settings) {
    switch (settings.name) {
      case '/':
        return MaterialPageRoute(builder: (_) => const HomePage());

      case '/centre-detail':
        final centreName = settings.arguments as String;
        return MaterialPageRoute(
          builder: (_) => CentreDetail(centreName: centreName),
        );

      case '/demande':
        return MaterialPageRoute(builder: (_) => const DemandePage());

      default:
        return MaterialPageRoute(
          builder: (_) => const Scaffold(
            body: Center(child: Text('Page non trouvée')),
          ),
        );
    }
  }
}
