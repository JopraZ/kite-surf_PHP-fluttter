import 'package:flutter/material.dart';
import '../../widgets/centre_card.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    final centres = [
      'Kite Center Marseille',
      'Wind Riders',
      'Ocean Kite School',
    ];

    return Scaffold(
      appBar: AppBar(title: const Text('Centres de kitesurf')),
      body: ListView.builder(
        padding: const EdgeInsets.all(16),
        itemCount: centres.length,
        itemBuilder: (_, index) {
          return CentreCard(name: centres[index]);
        },
      ),
    );
  }
}
